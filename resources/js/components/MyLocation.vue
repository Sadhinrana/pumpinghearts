<template>
    <div id="map" style="height: 400px;"></div>
</template>

<script>
    export default {
        data: function () {
            return {
                auth: window.auth,
                map: null,
                user: {
                },
            }
        },
        methods: {
            getUserData: function () {
                let app = this;
                axios.get(window.location.href)
                    .then(function (resp) {
                        app.user = resp.data;
                        app.map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: parseFloat(app.user.lat), lng: parseFloat(app.user.long)},
                            radius: 500,
                            zoom: 15
                        });
                        var infowindow = new google.maps.InfoWindow({
                            content: app.user.location
                        });
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(app.user.lat), lng: parseFloat(app.user.long)},
                            map: app.map,
                            title: app.auth.name
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(app.map,marker);
                        });
                        google.maps.event.trigger(marker,'click');
                    })
                    .catch(function () {
                        alert("Could not load your profile")
                    });
            }
        },
        mounted() {
            this.getUserData();
        }
    }
</script>
