<template>
    <div v-if="showModal" class="modal-overlay">
      <div class="modal">
        <qrcode-vue :value="qrValue"></qrcode-vue>
        <button @click="imprimirQR">Imprimir</button>
        <button @click="descargarQR">Descargar</button>
        <button @click="closeModal">Cerrar</button>
      </div>
    </div>
  </template>
  
  <script>
  import QrcodeVue from 'qrcode.vue';
  
  export default {
    components: {
      QrcodeVue
    },
    props: ['qrValue', 'showModal'],
    methods: {
        imprimirQR() {
    const canvas = this.$el.querySelector('canvas');
    const qrImage = canvas.toDataURL('image/png');
    let printWindow = window.open('', '_blank', 'width=400,height=200');
    printWindow.document.write('<html><head><title>Imprimir QR</title></head><body><img src="' + qrImage + '"></body></html>');
    printWindow.document.close();
    printWindow.focus();
    setTimeout(() => {
      printWindow.print();
      printWindow.close();
    }, 250); // Pequeño retardo para asegurarse de que la imagen se carga
  },
      descargarQR() {
        const canvas = document.querySelector('canvas');
        const pngUrl = canvas
          .toDataURL('image/png')
          .replace('image/png', 'image/octet-stream');
        let downloadLink = document.createElement('a');
        downloadLink.href = pngUrl;
        downloadLink.download = 'qr.png';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
      },
      closeModal() {
        this.$emit('close');
      }
    }
  }
  </script>
  
  <style>
  .modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000; /* Asegura que el modal esté sobre otros elementos */
}

.modal {
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 1001; /* Asegura que el contenido del modal esté sobre el overlay */
  max-width: 500px; /* O el ancho que prefieras */
  width: 90%; /* Ajuste para dispositivos móviles */
}

.modal button {
  margin-top: 15px;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: white;
  cursor: pointer;
}

.modal button:hover {
  background-color: #0056b3;
}

  </style>
  