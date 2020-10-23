<template>
    <div class="container ">
        <div class="row " >
            <div class="col-md-12">
                <br>
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Imóveis</h3>
                    </div>
                    <div class="card-body">
                        <data-table
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
    import BtnPrimary from '../../components/Botoes/BtnPrimary.vue';

    export default {
        data() {
            return {
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
                        label: 'Rua',
                        name: 'rua',
                        orderable: true,
                    },
                    {
                        label: 'Numero',
                        name: 'numero',
                        orderable: true,
                        width:'10'
                    },

                    {
                        label: 'Cidade',
                        name: 'cidade',
                        orderable: true,
                    },
                    {
                        label: '',
                        name: 'Ver',
                        orderable: false,
                        classes: {
                            'btn': true,
                            'btn-primary': true,
                            'btn-sm': true,
                        },
                        event: "click",
                        handler: this.displayRow,
                        component: BtnPrimary,
                        width:'10'
                    },
                ]
            }
        },
        name: "Imovel",
        components: {
            Loading,
            BtnPrimary
        },
        methods: {
            displayRow(data) {
                alert(`You clicked row ${data.id}`);
            },
        }
    }
</script>

<style scoped>

</style>