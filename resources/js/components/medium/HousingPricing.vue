<script setup>
  import { reactive, toRefs } from 'vue';
  import InputNumber from '@/components/small/InputNumber.vue';

  const props = defineProps(['formData']);
  const inputData = reactive({
    "price_night": {
      "label": "Tarif par nuit (€)",
      "id": "price_night",
      "step": "0.01",
      "isRequired": true,
      "isDisabled": false,
      "tabindex": 1,
      "placeholder": ""
    },
    "min_number_nights": {
      "label": "Nombre de nuits minimun",
      "id": "min_number_nights",
      "step": "1",
      "isRequired": true,
      "isDisabled": false,
      "tabindex": 2,
      "placeholder": ""
    },
    "security_deposit": {
      "label": "Dépôt de garantie (€)",
      "id": "security_deposit",
      "step": "0.01",
      "isRequired": true,
      "isDisabled": false,
      "tabindex": 3,
      "placeholder": ""
    },
    "cleaning_charges": {
      "label": "Frais de ménages (€)",
      "id": "security_deposit",
      "step": "0.01",
      "isRequired": true,
      "isDisabled": false,
      "tabindex": 4,
      "placeholder": ""
    },
  });

  const {
    price_night,
    min_number_nights,
    security_deposit,
    cleaning_charges,
  } = toRefs(props.formData);
</script>

<template>
  <div class="housingpricing">
    <h2 class="housingpricing-title">Tarification & Disponibilités</h2>
    <div class="housingpricing-grid">
      <InputNumber v-model="price_night" :inputData="inputData['price_night']" :error="props.formData.errors.price_night" />
      <InputNumber v-model="min_number_nights" :inputData="inputData['min_number_nights']" :error="props.formData.errors.min_number_nights" />
      <InputNumber v-model="security_deposit" :inputData="inputData['security_deposit']" :error="props.formData.errors.security_deposit" />
      <InputNumber v-model="cleaning_charges" :inputData="inputData['cleaning_charges']" :error="props.formData.errors.cleaning_charges" />
    </div>
  </div>
</template>

<style scoped>
  .housingpricing {
    display: flex;
    flex-direction: column;
  }

  .housingpricing-title {
    font-family: Calibri, sans-serif;
    font-size: 32px;
    font-weight: bold;
    color: #000000;
  }

  .housingpricing-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    row-gap: 30px;
    column-gap: 50px;
    margin-top: 40px;
  }

  @media screen and (max-width: 1000px) {
    .housingpricing-grid {
      display: flex;
      flex-direction: column;
    }
  }
</style>