<script setup>
  import Header from '@/components/Header.vue'
  import Title from '@/components/small/Title.vue'
  import TitleText from '@/components/small/TitleText.vue'
  import Footer from '@/components/Footer.vue'

  import ConditionsGeneralesVentesTexts from "@/../json/texts/ConditionsGeneralesVentesTexts"
</script>

<template>
  <Header />
  <Title :text="ConditionsGeneralesVentesTexts.title" />
  <template v-for="(paragraph, index) in ConditionsGeneralesVentesTexts.paragraphs" :key="index">
    <TitleText
      :title="paragraph.title"
      :texts="paragraph.texts"
    />
  </template>
  <Footer />
</template>

<style scoped>
</style>