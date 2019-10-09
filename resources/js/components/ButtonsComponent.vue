<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div id="button-like">
                        <button v-on:click="like()">Curtir</button>
                        <p>Quantas vezes o botão acima foi clicado: {{ counterLike }}</p>
                    </div>

                    <div id="button-deslike">
                        <button v-on:click="deslike()">Deslike</button>
                        <p>Quantas vezes o botão acima foi clicado: {{ counterDeslike }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script>
export default {
    data() {
        return {           
            counterLike: 0,
            counterDeslike: 0,
            output: ''
        }
    },
    methods: {
        like() {
            this.counterLike++;
            this.formSubmit();
        },

        deslike() {
            this.counterDeslike++;
            this.formSubmit();
        },

        formSubmit() {
            var thiusOutput = this;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                },
                type:'POST',
                url:'/home',
                data:  { 
                    counterLike: 0,
                    counterDeslike: 0,
                    output: ''
                },
                success: function(response){
                    console.log('ok');
                    // $("#msg").html(response.msg);
                }
            });
        }
    }
}
</script>
