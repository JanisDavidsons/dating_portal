<template>
    <div>
        <div>
            <vue-slider v-model="value" :enable-cross="false" :tooltip="'always'"></vue-slider>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <div class="pt-3">
                    <button class="btn btn-primary" style="width: 100px" @click="set">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/antd.css'

    export default {
        components: {
            VueSlider
        },
        data() {
            return {
                value: [18, 70],
                options: {
                    eventType: 'auto',
                    width: 'auto',
                    height: 10,
                    dotSize: 16,
                    min: 0,
                    max: 100,
                    interval: 1,
                    show: true,
                    speed: 1,
                    tooltipDir: 'top'
                }
            }
        },

        methods: {
            set() {
                axios
                    .post('/settings/' + this.value[0] + '/' + this.value[1])
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(errors => {
                        console.log('error')
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        watch: {
            value: function (newId) {

            }
        },
    }
</script>
