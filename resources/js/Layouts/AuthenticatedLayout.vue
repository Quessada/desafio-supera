<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
  
      <div class="flex-1 flex flex-col overflow-hidden">
        <Header />
  
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-8">

            

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                
            </div>

          </div>
        </main>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import PrimaryButton from "@/Components/PrimaryButton.vue";
  import NavLink from "@/Components/NavLink.vue";
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