<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
  
      <div class="flex-1 flex flex-col overflow-hidden">
        <Header />
  
          <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 text-white rounded-lg">
                Seja bem-vindo a SUPERA INOVAÇÃO EM TECNOLOGIA!
                  
                <div class="px-4 py-5 justify-content align-items content-center">
                    <img
                    src="/images/logo-supera.svg"
                    alt="logo"
                    style="width= 150px; height:100px;"
                  />
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">

  import { useForm, Head } from "@inertiajs/inertia-vue3";

  import Header from "../Components/Header.vue";


  defineProps(["vehicles"]);

  const form = useForm({
    name: "",
    code: "",
    price: "",
    image: "",
    });

  </script>