<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div id="button-like">
                        <button v-on:click="like()">Curtir</button>
                        <p>Quantas vezes o botão acima foi clicado: {{ values.counterLike }}</p>
                    </div>

                    <div id="button-deslike">
                        <button v-on:click="deslike()">Deslike</button>
                        <p>Quantas vezes o botão acima foi clicado: {{ values.counterDeslike }}</p>
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
            user: {},
            values: {
                counterLike: 0,
                counterDeslike: 0
            },
            output: ''
        }
    },

    mounted:function(){
        this.showLikeAndDeslikeUser();
    },

    methods: {
        showLikeAndDeslikeUser: async function() {
            let user = await this.returnUserLikeAndDeslike();
            this.setLikeAndDeslikeUser(user);
        },

        returnUserLikeAndDeslike: async function() {
            let result = await this.$http.get('/users');
            let infoUser = JSON.parse(result.bodyText);
            return infoUser;
        },

        setLikeAndDeslikeUser: function(user) {
            this.values.counterLike = user.like;
            this.values.counterDeslike = user.deslike;
        },

        like() {
            this.values.counterLike++;
        },

        deslike() {
            this.values.counterDeslike++;
        }
    },
}
</script>
