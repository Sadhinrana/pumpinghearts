<template>
    <div id="map"></div>
</template>

<script>
    export default {
        data: function () {
            return {
                auth: window.auth,
                map: null,
                user: [],
            }
        },
        methods: {
            getUserData: function () {
                let _this = this;
                axios.get(window.location.href)
                    .then(function (resp) {
                        _this.user = resp.data;

                        _this.map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: 23.7439732, lng: 90.3705565},
                            zoom: 15
                        });

                        for (let index = 0 ; index < _this.user.length; ++index) {
                            let lat = parseFloat(_this.user[index].lat);
                            let long = parseFloat(_this.user[index].long);
                            let name = _this.user[index].title;
                            let image = _this.user[index].picture;

                            var infowindow = new google.maps.InfoWindow({
                                content: name
                            });
                            var marker = new google.maps.Marker({
                                position: {lat: lat, lng: long},
                                map: _this.map,
                                icon: image,
                                title: name
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(_this.map,marker);
                            });
                            google.maps.event.trigger(marker,'click');
                            var cityCircle = new google.maps.Circle({
                                strokeColor: '#1e1aff',
                                strokeOpacity: 0.8,
                                strokeWeight: 2,
                                fillColor: '#fa88ff',
                                fillOpacity: 0.35,
                                map: _this.map,
                                center: {lat: lat, lng: long},
                                radius: 0.1 * 100
                            });
                        }
                    })
                    .catch(function () {
                        alert("Could not load trainer!")
                    });
            }
        },
        mounted() {
            this.getUserData();
        }
    }
</script>
