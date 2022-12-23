<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
  
      <div class="flex-1 flex flex-col overflow-hidden">
        <Header />
  
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div
          class="
            max-w-2xl
            mx-auto
            p-4
            sm:p-6
            lg:p-8
            w-full
            sm:max-w-md
            mt-6
            px-6
            py-4
            bg-white
            shadow-md
            overflow-hidden
            sm:rounded-lg
          ">
          <form
          @submit.prevent="
            form.post(route('vehicles.update', props.vehicle.id), {
              onSuccess: () => form.reset(),
            })
          ">

            <div>
              <InputLabel for="model" value="Modelo" />
              <TextInput
                id="model"
                type="text"
                class="mt-1 block w-full"
                v-model="form.model"
                autofocus
              />
              <InputError class="mt-2" :message="form.errors.model" />
            </div>
          
            <div class="mt-4">
              <InputLabel for="brand_id" value="Marca" />
              <select v-model="form.brand_id" class="mt-1 block w-full">
                <option value="" disabled selected>-- Selecione uma marca --</option>
                <option v-for="brand in vehicle_brands" :key="brand" :value="brand.id" :selected="brand.id">{{ brand.name }}</option>
              </select>
              <InputError class="mt-2" :message="form.errors.brand_id" />
            </div>

            <div class="mt-4">
              <InputLabel for="type_id" value="Tipo" />
              <select v-model="form.type_id" class="mt-1 block w-full">
                <option value="" disabled selected>-- Selecione um tipo --</option>
                <option v-for="vtype in vehicle_types" :key="vtype" :value="vtype.id" :selected="vtype.id"> {{ vtype.name }} </option>
              </select>
              <InputError class="mt-2" :message="form.errors.type_id" />
            </div>

            <div class="mt-4">
              <InputLabel for="version" value="Versão" />
              <TextInput
                id="version"
                type="text"
                class="mt-1 block w-full"
                v-model="form.version"
                autofocus
              />
              <InputError class="mt-2" :message="form.errors.version" />
            </div>
          
            <div class="mt-4">
              <InputLabel for="plate" value="Placa" />
              <TextInput
                id="plate"
                type="text"
                class="mt-1 block w-full"
                v-model="form.plate"
                autofocus
              />
              <InputError class="mt-2" :message="form.errors.plate" />
            </div>

            <div class="mt-4">
              <InputLabel for="year" value="Ano" />
              <TextInput
                id="year"
                type="text"
                class="mt-1 block w-full"
                v-model="form.year"
                autofocus
              />
              <InputError class="mt-2" :message="form.errors.year" />
            </div>

            <PrimaryButton class="mt-4">Atualizar</PrimaryButton>

          </form>
          
        </div>

        </main>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import PrimaryButton from "@/Components/PrimaryButton.vue";
  import { useForm, Head } from "@inertiajs/inertia-vue3";
  import InputError from "@/Components/InputError.vue";

  import Header from "../../Components/Header.vue";
  import TextInput from "@/Components/TextInput.vue";
  import InputLabel from "@/Components/InputLabel.vue";


  const props = defineProps(["vehicle", "vehicle_brands", "vehicle_types"]);

  const form = useForm({
    model: props.vehicle.model,
    brand_id: props.vehicle.brand_id,
    type_id: props.vehicle.type_id,
    year: props.vehicle.year,
    plate: props.vehicle.plate,
    version: props.vehicle.version,
    user_id: props.vehicle.user_id,
    _method: "PUT",
    });

  </script>