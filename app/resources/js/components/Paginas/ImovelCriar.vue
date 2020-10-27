<template>

    <form @submit.prevent="cadastrar">
        <div class="container ">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <br>
                    <!-- form imovel info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Cadastro de Imóvel</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input v-model="form.email" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" name="email">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Rua</label>
                                <div class="col-lg-9">
                                    <input v-model="form.rua" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('rua') }" name="rua">
                                    <has-error :form="form" field="rua"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Número</label>
                                <div class="col-lg-9">
                                    <input v-model="form.numero" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('numero') }" name="numero">
                                    <has-error :form="form" field="numero"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Complemento</label>
                                <div class="col-lg-9">
                                    <input v-model="form.complemento" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('complemento') }" name="complemento">
                                    <has-error :form="form" field="complemento"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Bairro</label>
                                <div class="col-lg-9">
                                    <input v-model="form.bairro" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bairro') }" name="bairro">
                                    <has-error :form="form" field="bairro"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Cidade</label>
                                <div class="col-lg-9">
                                    <input v-model="form.cidade" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('cidade') }" name="cidade">
                                    <has-error :form="form" field="cidade"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Estado</label>
                                <div class="col-lg-9">
                                    <select v-model="form.estado" :class="{ 'is-invalid': form.errors.has('estado') }" name="estado" class="form-control" size="0">
                                        <option value=""></option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="PR">PR</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="RS">RS</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                    <has-error :form="form" field="estado"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="submit" class="btn btn-primary" value="Salvar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /form imovel info -->
                </div>
            </div>
            <!--/row-->
            <loading
                    :is-full-page="true"
                    :active.sync="isLoading">
            </loading>
        </div>
        <!--/container-->
    </form>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    export default {

        data () {
            return {
                isLoading: false,
                fullPage: true,
                form: new Form({
                    remember: false
                })
            }
        },
        components: {
            Loading
        },
        methods: {
            async cadastrar() {
                this.isLoading=true,
                this.form.post('/api/imovel')
                    .then(( response ) => {
                        this.isLoading=false,
                        Swal.fire({
                            icon: 'success',
                            title: 'Salvo',
                            text: 'Imóvel cadastrado com sucesso!',
                        }).then((result) => {
                            this.loadImoveis();
                        });
                }).catch(resp => {
                    this.isLoading=false
                });
            },
            loadImoveis() {
                this.$router.push({name: 'imovel'});
            }
        }
    }
</script>

<style scoped>

</style>