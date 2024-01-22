<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

</script>
<template>
    <ModalQR v-if="mostrar" :qrValue="qrActual" :showModal="mostrar" @close="mostrar = false"></ModalQR>

    <AppLayout title="Equipos">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Equipos
            </h2>
        </template>

        <div class="py-12">

            <!--boton para imprimir todos los numeros de serie en qr en otra pestaña-->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <a :href="route('equipo.print')"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        target="_blank">Imprimir QR</a>
                </div>
            </div>
            <!--espacio entre el boton y la tabla-->
            <div class="py-5"></div>

            <!--tabla de equipos-->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">N° de Serie</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr v-for="equipo in equipos" :key="equipo.id">
                                <td class="border px-4 py-2 flex-none">{{ equipo.id }}</td>
                                <td class="border px-4 py-2 flex-1 w-150">{{ equipo.n_serie }}</td>
                                <td class="border px-4 py-2 flex-1 w-64">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        @click="mostrarModal(equipo.n_serie)">
                                        Generar QR
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </AppLayout>
</template>

<style>
.table-auto tr:nth-child(even) {
    background-color: #f2f2f2;
    /* Color para filas alternas */
    /* Opcional: añade una transición para que el cambio de color sea más suave */
    transition: background-color 0.2s ease-in-out;
}

.table-auto tr:hover {
    background-color: #e0e0e0;
    /* Color para filas al pasar el cursor */
}

.table-auto td,
.table-auto th {
    border: 1px solid #ddd;
    text-align: center;
}
</style>
  
<script>

import QRCode from 'qrcode.vue';
import ModalQR from '@/Components/ModalQR.vue';

export default {
    components: {
        QRCode,
        ModalQR
    },
    // Resto del componente...
    methods: {
        mostrarModal(nSerie) {
            this.qrActual = nSerie;
            this.mostrar = true;
        }
    },
    data() {
        return {
            mostrar: false,
            qrActual: ''
        };
    },
    props: {
        equipos: Array
    }
}
</script>
  