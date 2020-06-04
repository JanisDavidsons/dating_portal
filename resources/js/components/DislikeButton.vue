<template>
    <div class="container">
        <button class="btn btn-danger" style="width: 100px" @click="dislikeUser" v-text='buttonText'></button>
    </div>
</template>



<script>
    export default {
        props: ['userId', 'dislikes'],

        data: function () {
            return {
                status: this.dislikes,
            }
        },

        methods: {
            dislikeUser() {
                console.log(this.userId)
                axios.post('/affection/ ' + this.userId + '/dislike')
                    .then(response => {
                        console.log(response)
                        this.status = !this.status;
                        window.location = '/match/show';

                    })
                    .catch(errors => {
                        console.log('error')
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Disliked !!' : 'Dislike';
            }
        },
    }
</script>

<style scoped>
</style>




