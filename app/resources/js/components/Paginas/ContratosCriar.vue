<template>

    <form @submit.prevent="cadastrar">
        <div class="container ">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <br>
                    <!-- form imovel info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Cadastro de Contrato</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Tipo Pessoa</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" v-model="form.tipo_pessoa" type="radio" name="tipo_pessoa" id="tipo_pessoaF" :class="{ 'is-invalid': form.errors.has('tipo_pessoa') }"  value="F">
                                        <label class="form-check-label" for="tipo_pessoaF">Pessoa Física</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" v-model="form.tipo_pessoa" type="radio" name="tipo_pessoa" id="tipo_pessoaJ" :class="{ 'is-invalid': form.errors.has('tipo_pessoa') }"   value="J">
                                        <label class="form-check-label" for="tipo_pessoaJ">Pessoa Jurídica</label>
                                    </div>
                                    <has-error :form="form" field="tipo_pessoa"></has-error>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Imóvel</label>
                                <div class="col-lg-9">
                                    <select v-model="form.propriedade" :class="{ 'is-invalid': form.errors.has('propriedade') }" name="propriedade" class="form-control" size="0">
                                        <option v-for="(imovel, index) in propriedades"
                                                :key="index"
                                                :value="imovel.id">{{imovel.rua}}, {{imovel.numero}},{{imovel.complemento}},{{imovel.bairro}}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="propriedade"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nome</label>
                                <div class="col-lg-9">
                                    <input v-model="form.nome" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('nome') }" name="nome">
                                    <has-error :form="form" field="nome"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input v-model="form.email" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" name="email">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Documento</label>
                                <div class="col-lg-9">
                                    <input v-model="form.documento" v-mask="['###.###.###-##', '##.###.###/####-##']" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('documento') }" name="documento">
                                    <has-error :form="form" field="documento"></has-error>
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

    import {mask} from 'vue-the-mask'

    export default {

        data () {
            return {
                isLoading: false,
                fullPage: true,
                form: new Form({
                    remember: false
                }),
                propriedades:[]
            }
        },
        directives: {mask},
        components: {
            Loading
        },
        methods: {
            async cadastrar() {
                this.isLoading=true,
                this.form.post('/api/contrato')
                    .then(( response ) => {
                        this.isLoading=false,
                        Swal.fire({
                            icon: 'success',
                            title: 'Salvo',
                            text: 'Contrato cadastrado com sucesso!',
                        }).then((result) => {
                            this.loadImoveis();
                        });
                }).catch(resp => {
                    this.isLoading=false
                });
            },
            async getImoveis () {
                await axios.get('api/imovel')
                    .then(response => {
                        this.propriedades = response.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
            },
            loadImoveis() {
                this.$router.push({name: 'contrato'});
            }
        },
        created () {
            this.getImoveis()
        }
    }
</script>

<style scoped>

</style>