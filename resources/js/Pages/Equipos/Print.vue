<template>
    <div class="print-area">
      <div v-for="equipo in equipos" :key="equipo.id" class="qr-item">
        <qrcode-vue :value="equipo.n_serie"></qrcode-vue>
        <p>{{ equipo.n_serie }}</p>
      </div>
    </div>
  </template>
  
  <script>
  import QrcodeVue from 'qrcode.vue';
  
  export default {
    components: {
      QrcodeVue
    },
    props: {
      equipos: Array
    }
  }
  </script>
  
  <style>
  .print-area {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); /* Ajusta el tamaño mínimo según el tamaño de tus QR */
  gap: 0px; /* Espacio entre códigos QR */
  padding: 10px; /* Espacio alrededor de toda la cuadrícula */
}

.print-area .qr-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border: 1px solid #ddd; /* Borde sutil para cada cuadrícula */
  padding: 10px;
  background-color: #fff; /* Fondo blanco para cada QR */
}

.print-area .qr-item qrcode-vue {
  margin-bottom: 10px; /* Espacio entre el QR y el texto */
}

.print-area p {
  margin: 0;
  font-size: 12px; /* Ajusta el tamaño del texto si es necesario */
}
  </style>
  