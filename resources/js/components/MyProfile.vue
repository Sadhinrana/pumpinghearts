
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div v-if="success" class="alert alert-success" role="alert">
                    {{success}}
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form v-on:submit.prevent="updateForm()">
                            <div class="form-group">
                                <label class="control-label">My Location</label>
                                <input type="text" id="autocomplete" v-model="user.location" class="form-control" placeholder="Enter Location">
                                <p class="text-danger" v-if="errors.location">{{errors.location[0]}}</p>
                            </div>
                            <div id="map" style="width: 100%; height: 400px;"></div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                auth: window.auth,
                map: null,
                userId: null,
                user: {
                    name:"",
                    location:"",
                    lat:"",
                    long :""
                },
                errors : [],
                success: '',
                autocomplete: null
            }
        },

        methods: {
            generateAutoComplete: function(){
                let _this = this;
                this.autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), {types: ['geocode']});
                this.autocomplete.addListener('place_changed', function () {
                    let place = _this.autocomplete.getPlace();
                    _this.user.location = place.formatted_address;
                    _this.user.lat = place.geometry.location.lat();
                    _this.user.long = place.geometry.location.lng();
                })
            },
            updateForm() {
                var app = this;
                var user = app.user;
                axios.post(base_url + '/userLocationUpdate', user)
                    .then(function (response) {
                        app.user = response.data;
                        app.success = 'Your location updated successfully.';
                        setTimeout(function () {
                            $('.alert').hide();
                        }, 3000);
                        app.getUserData();
                    })
                    .catch(function () {
                        alert("Could not update your location");
                    });
            },
            getUserData: function () {
                let app = this;
                axios.get(base_url + '/user/'+this.auth.id+'/dashboard/profile-details')
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
            this.generateAutoComplete();
            let app = this;
            app.getUserData();
        }
    }
</script>
