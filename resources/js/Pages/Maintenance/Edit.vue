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
          form.post(route('maintenances.store'), {
            onSuccess: () => form.reset(),
          })
        ">

          <div>
            <InputLabel for="description" value="Descrição" />
            <TextInput
              id="model"
              type="text"
              class="mt-1 block w-full"
              v-model="form.description"
              autofocus
            />
            <InputError class="mt-2" :message="form.errors.description" />
          </div>

          <div class="mt-4">
              <InputLabel for="vehicle_id" value="Veículo" />
              <select v-model="form.vehicle_id" class="mt-1 block w-full">
                <option value="" disabled selected>-- Selecione um veículo --</option>
                <option v-for="vehicle in vehicles" :key="vehicle" :value="vehicle.id" :selected="vehicle.id">{{ vehicle.model }}</option>
              </select>
              <InputError class="mt-2" :message="form.errors.vehicle_id" />
          </div>
        
          <div class="mt-4">
              <InputLabel for="date" value="Data da Manutenção" />
              <input type="date" name="date" id="date" v-model="form.date">
              <InputError class="mt-2" :message="form.errors.date" />
          </div>

          <PrimaryButton class="mt-4">Criar</PrimaryButton>

        </form>
        
      </div>

      </main>
    </div>
  </div>
</template>

<script setup lang="ts">
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";

import Header from "../../Components/Header.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";


const props = defineProps(["vehicles", "maintenance"]);


const form = useForm({
  description: props.maintenance.description,
  vehicle_id: props.maintenance.vehicle_id,
  user_id: props.maintenance.user_id,
  date: props.maintenance.date,
});

function formatDate(date) {
  return date && new Date(date.getTime()-(date.getTimezoneOffset()*60*1000)).toISOString().split('T')[0]
}

</script>