<template>
    <div class="container ">
        <div class="row " >
            <div class="col-md-12">
                <br>
                <div class="card card-outline-secondary">
                    <div class="card-header d-flex flex-row align-items-center">
                        <h3 class="mb-0 float-left">Imóveis</h3>
                        <router-link to="imovel-criar"  class="btn btn-success ml-auto" style="align-items: center">
                            <i class="fa fa-plus-circle"></i> Adicionar
                        </router-link>
                    </div>
                    <div class="card-body">
                        <data-table
                                ref="datatableImovel"
                                :url="url"
                                :columns="columns"
                                :per-page="perPage"
                                @loading="isLoading = true"
                                @finished-loading="isLoading = false"
                        >
                        </data-table>
                        <loading
                                :is-full-page="true"
                                :active.sync="isLoading">
                        </loading>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import BtnDanger from '../../components/Botoes/BtnDanger.vue';

    export default {
        data() {
            return {
                form: new Form({
                    remember: false
                }),
                isLoading: false,
                url: '/api/imovel-datatable',
                perPage: ['10', '25', '50'],
                rows:[],
                translate: {
                    nextButton: 'Próximo', previousButton: 'Anterior', placeholderSearch: 'Pesquisa'
                },

                columns: [

                    {
                        label: 'Email',
                        name: 'email',
                        orderable: true,
                    },
                    {
                        label: 'Endereco',
                        name: 'endereco',
                        orderable: true,
                    },
                    {
                        label: '',
                        name: 'Excluir',
                        orderable: false,
                        classes: {
                            'btn': true,
                            'btn-danger': true,
                            'btn-sm': true,
                        },
                        classesicon:{
                            'fa': true,
                            'fa-times-circle': true,
                        },
                        event: "click",
                        handler: this.excluirImovel,
                        component: BtnDanger,
                        width:'10'
                    },
                ]
            }
        },
        name: "Imovel",
        components: {
            Loading,
            BtnDanger
        },
        methods: {
            reloadTable() {
                this.$refs.datatableImovel.getData();
            },
            excluirImovel(data){
                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você não será capaz de reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim!'
                }).then((result) => {

                    if (result.value) {
                        this.isLoading= true,
                        //Send Request to server
                        this.form.delete('api/imovel/'+data.id)
                            .then((response)=> {
                                this.isLoading= false,
                                Swal.fire(
                                    'Excluído!',
                                    'Imóvel excluído com sucesso',
                                    'success'
                                ).then((result) => {
                                    this.reloadTable();
                                })
                            });
                    }

                })
            }
        }
    }
</script>

<style scoped>

</style>