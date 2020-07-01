<template>

    <div class="container">
        <button class="btn btn-primary" style="width: 100px" @click="likeUser" v-text='buttonText'></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'likes'],

        data: function () {
            return {
                status: this.likes,
            }
        },

        methods: {
            likeUser() {
                axios.post('/match/ ' + this.userId + '/like')
                    .then(response => {
                        console.log(response.data)
                        this.status = !this.status;
                        window.location = '/profiles/show';
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
                return (this.status) ? 'Liked !!' : 'Like';
            }
        }
    }
</script>




