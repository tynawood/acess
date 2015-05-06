angular.module('ionic-geofence')
    .controller('GeofencesCtrl', function ($scope, $ionicActionSheet, $timeout, $log, $state, geolocationService, geofenceService, $ionicLoading, $ionicActionSheet) {
        $ionicLoading.show({
            template: 'Getting geofences from device...',
            duration: 5000
        });

        $scope.geofences = [];

        geofenceService.getAll().then(function (geofences) {
            $ionicLoading.hide();
            $scope.geofences = geofences;
        }, function (reason) {
            $ionicLoading.hide();
            $log.log('An Error has occured', reason);
        });

        $scope.createNew = function () {
            $log.log('Obtaining current location...');
            $ionicLoading.show({
                template: 'Obtaining current location...'
            });
            geolocationService.getCurrentPosition()
                .then(function (position) {
                    $log.log('Current location found');
                    $ionicLoading.hide();

                    geofenceService.createdGeofenceDraft = {
                        id: UUIDjs.create().toString(),
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude,
                        radius: 1000,
                        transitionType: TransitionType.ENTER,
                        notification: {
                            id: geofenceService.getNextNotificationId(),
                            title: 'Ionic geofence example',
                            text: '',
                            openAppOnClick: true
                        }
                    };
                    geofenceService.createdGeofenceDraft.notification.data = angular.copy(geofenceService.createdGeofenceDraft);
                    $state.go('geofence', {
                        geofenceId: geofenceService.createdGeofenceDraft.id
                    });
                }, function (reason) {
                    $log.log('Cannot obtain current location', reason);
                    $ionicLoading.show({
                        template: 'Cannot obtain current location',
                        duration: 1500
                    });
                });
        };

        $scope.editGeofence = function (geofence) {
            $state.go('geofence', {
                geofenceId: geofence.id
            });
        };

        $scope.removeGeofence = function (geofence) {
            geofenceService.remove(geofence);
        };

        $scope.more = function () {
            // Show the action sheet
            $ionicActionSheet.show({
                buttons: [
                    { text: 'Test application' }
                ],
                destructiveText: 'Delete all geofences',
                titleText: 'More options',
                cancelText: 'Cancel',
                destructiveButtonClicked: function () {
                    geofenceService.removeAll();
                    return true;
                },
                buttonClicked: function(index) {
                    window.location.href = 'cdvtests/index.html';
                }
            });
        };
    })

.controller('GeofenceCtrl', function ($scope, $state, $ionicLoading, geofence, geofenceService) {
    $scope.geofence = geofence;
    $scope.TransitionType = TransitionType;

    $scope.center = {
        lat: geofence.latitude,
        lng: geofence.longitude,
        zoom: 12
    };
    $scope.markers = {
        marker: {
            draggable: true,
            message: geofence.notification.text,
            lat: geofence.latitude,
            lng: geofence.longitude,
            icon: {}
        }
    };
    $scope.paths = {
        circle: {
            type: 'circle',
            radius: geofence.radius,
            latlngs: $scope.markers.marker,
            clickable: false
        }
    };

    $scope.isTransitionOfType = function (transitionType) {
        return ($scope.geofence.transitionType & transitionType);
    };

    $scope.isWhenGettingCloser = function () {
        return $scope.geofence.transitionType === TransitionType.ENTER;
    };

    $scope.toggleWhenIgetCloser = function () {
        $scope.geofence.transitionType ^= TransitionType.ENTER;
    };

    $scope.toggleWhenIamLeaving = function () {
        $scope.geofence.transitionType ^= TransitionType.EXIT;
    };

    $scope.save = function () {
        if (validate()) {
            $scope.geofence.radius = parseInt($scope.paths.circle.radius);
            $scope.geofence.latitude = $scope.markers.marker.lat;
            $scope.geofence.longitude = $scope.markers.marker.lng;
            geofenceService.addOrUpdate($scope.geofence);
            $state.go('geofences');
        }
    };

    function validate () {
        if (!$scope.geofence.notification.text) {
            $ionicLoading.show({
                template: 'Please enter some notification text.',
                duration: 3000
            });
            return false;
        }

        if ($scope.geofence.transitionType === 0) {
            $ionicLoading.show({
                template: 'You must select when you want notification. When entering or/and exiting region?',
                duration: 3000
            });
            return false;
        }
        return true;
    };
});
