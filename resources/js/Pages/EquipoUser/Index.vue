<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

</script>
<template>
    <AppLayout title="Asignaciones">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Asignaciones
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">ID_Equipo</th>
                                <th class="px-4 py-2">N_Serie</th>
                                <th class="px-4 py-2">ID_Usuario</th>
                                <th class="px-4 py-2">Nombre Usuario</th>
                                <th class="px-4 py-2">Fecha de Asignación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="equipoUser in equipoUsers" :key="equipoUser.id">
                                <td class="border px-4 py-2">{{ equipoUser.id }}</td>
                                <td class="border px-4 py-2">{{ equipoUser.equipo_id }}</td>
                                <td class="border px-4 py-2">{{ equipoUser.equipo.n_serie }}</td>
                                <td class="border px-4 py-2">{{ equipoUser.user_id }}</td>
                                <td class="border px-4 py-2">{{ equipoUser.user.name }}</td>
                                <td class="border px-4 py-2">{{ equipoUser.fecha_asignacion }}</td>
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
export default {
    props: {
        equipoUsers: Array
    }
}
</script>
  