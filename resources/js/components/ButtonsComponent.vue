<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row d-flex justify-content-between" style="margin:0">
                    <div id="button-like">
                        <button class="btn btn-primary btn-lg" v-on:click="like()">Curtir</button>
                    </div>

                    <div id="button-deslike">
                        <button class="btn btn-primary btn-lg" v-on:click="deslike()">Não Curtir</button>
                    </div>
                </div>

                <div class="card-body" style="padding:1.25rem 0;">
                    <div>
                        <p class="text-left font-weight-bold">Total de Curtidas: {{ values.counterLike }}</p>
                    </div>
                    <div>
                        <p class="text-left font-weight-bold" style="margin-bottom:0px">Total não Curtidas: {{ values.counterDeslike }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { log } from 'util';
export default {
    data() {
        return {
            values: {
                id: 0,
                counterLike: 0,
                counterDeslike: 0
            }
        }
    },

    beforeMount:function(){
        this.showLikeAndDeslikeUser();
    },

    methods: {
        showLikeAndDeslikeUser: async function() {
            let user = await this.returnUserLikeAndDeslike();
            this.setLikeAndDeslikeUser(user);
        },

        returnUserLikeAndDeslike: async function() {
            let result = await this.$http.get('users');
            let infoUser = JSON.parse(result.bodyText);
            return infoUser;
        },

        setLikeAndDeslikeUser: function(user) {
            this.values.id = user.id;
            this.values.counterLike = user.like;
            this.values.counterDeslike = user.deslike;
        },

        setUserLikeAndDeslikePost: async function() {
            let data = {
                id: this.values.id,
                like: this.values.counterLike,
                deslike: this.values.counterDeslike,
                output: ''
            }

            try {
                let result = await this.$http.put('users/' + data.id , data, data.id);
            } catch (error) {

            }
        },

        like() {
            this.values.counterLike++;
            this.setUserLikeAndDeslikePost();
        },

        deslike() {
            this.values.counterDeslike++;
            this.setUserLikeAndDeslikePost();
        }
    }
}
</script>
