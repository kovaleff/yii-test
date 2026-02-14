<script setup>
import {ref, onMounted, reactive} from 'vue';
import {Button} from "primevue";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import Client from "./repositories/Client.js";
import State from "./repositories/State.js";
import Dialog from 'primevue/dialog';
import Select from 'primevue/select';

const products = ref();
const states = ref();
const newClientVisible = ref(false);
const newClient = reactive({name: '', state:''})

onMounted(() => {
  Client.get().then((result) => (products.value = result.data.data)).catch(() => {});
});

function getAllClients(){
  State.get().then((result) => (states.value = result.data.data.map(_ => _.attributes))).catch(() => {});
}

onMounted(() => {
  getAllClients()
});

function addNewClient(){
  Client.create({name:newClient.name, id_state:newClient.state.id}).then(result => getAllClients()).catch(() => {
  });
  newClientVisible.value = false
}

</script>

<template>
  <div class="card">
    <DataTable :value="products" tableStyle="min-width: 50rem">
      <template #header>
        <div class="d-flex justify-content-between">
          <span class="text-xl font-bold">Products</span>
          <Button icon="pi pi-refresh" rounded raised label="add" @click="newClientVisible = true" v-if="newClientVisible == false"/>
        </div>
      </template>
      <Column field="attributes.name" header="Name"></Column>
      <Column header="Status">
        <template #body="slotProps">
          <Button label="Active" severity="success" v-if="slotProps.data.attributes.status"/>
          <Button label="inActive" severity="warn" v-else/>
        </template>
      </Column>
      <Column header="State">
        <template #body="slotProps">
          {{states.find(_ => _.id == slotProps.data.attributes.id)['name']}}
        </template>
      </Column>
    </DataTable>
  </div>

  <Dialog v-model:visible="newClientVisible" modal header="Add client" :style="{ width: '25rem' }">
    <span class="text-surface-500 dark:text-surface-400 block mb-8">Update your information.</span>
    <div class="flex items-center gap-4 mb-4">
      <label for="username" class="font-semibold w-24">Name</label>
      <InputText id="" class="flex-auto" v-model="newClient.name" />
    </div>
    <div class="flex items-center gap-4 mb-8">
      <label for="email" class="font-semibold w-24">State</label>
      <Select v-model="newClient.state" :options="states" optionLabel="name" placeholder="Select a State" class="w-full md:w-56" />
    </div>
    <div class="flex justify-end gap-2">
      <Button type="button" label="Cancel" severity="secondary" @click="newClientVisible = false"></Button>
      <Button type="button" label="Save" @click="addNewClient" :disabled="!newClient.name"></Button>
    </div>
  </Dialog>
</template>

<style scoped>
</style>
