<template>
    <div class="print-area">
      <div v-for="equipo in equipos" :key="equipo.id" class="qr-item">
        <qrcode-vue :value="equipo.n_serie"></qrcode-vue>
        <p>{{ equipo.n_serie }}</p>
      </div>
    </div>
  </template>

<style>

</style>

<script>
import QRCode from 'qrcode.vue';
import ModalQR from '@/Components/ModalQR.vue';
</script>