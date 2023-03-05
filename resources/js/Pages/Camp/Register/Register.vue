<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/CampAuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import {ref} from 'vue'

const member = ref(null)

const form = useForm({
  name: "",
  username: "",
  contact: "",
  dob:"",
  province:"",
  assembly:"",
  pastor:"",
  invite:"",
  need_accommodation:"",
  gender:"", 
});

const provinces = [
{
name:'Bulawayo'
},
{
name:'Harare'
},
{
name:'Bulawayo'
},
{
name:'Manicaland'
},
{
name:'Mashonaland Central'
},
{
name:'Mashonaland East'
},
{
name:'Mashonaland West'
},
{
name:'Masvingo'
},
{
name:'Matebeleland North'
},
{
name:'Matebeleland South'
},
]

const submit = () => {
  form.post(route("campRegister"), {
    // onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="Register" />

  <AuthenticationCard>
   

    <form @submit.prevent="submit" >
      <div>
        <InputLabel for="name" value="Name" />
        <TextInput
          id="name"
          v-model="form.name"
          type="text"
          class="mt-1 block w-full"
          required
          autofocus
          autocomplete="name"
        />
        <InputError class="mt-2" :message="form.errors.name" />
      </div>     

        <div class="mt-4">
          <InputLabel for="contact" value="Contact" />
          <TextInput
            id="contact"
            v-model="form.contact"
            type="text"
            class="block w-full mt-1"
            required
            
          />         

          <InputError class="mt-2" :message="form.errors.contact" />
        </div>

      <div class="flex flex-wrap">
        <div class="mt-4">
          <InputLabel for="dob" value="Date of Birth" />
          <TextInput
            id="dob"
            v-model="form.dob"
            type="date"
            class="mt-1 block w-full"
            required
            autocomplete="dob"
          />
          <InputError class="mt-2" :message="form.errors.dob" />
        </div>

        <div class="mt-4 col-span-2 mx-auto">
          <InputLabel for="gender" value="Gender" />
          <select name="gender" id="gender" v-model="form.gender" class="h-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <InputError class="mt-2" :message="form.errors.gender" />
        </div>
      </div>

      <div class="mt-4">
        <fieldset>
                <InputLabel >Are you a member of our Church?</InputLabel>              
                <div class="mt-4 space-y-4">
                 
                  <div class="flex items-center">
                    <input id="member_yes" name="member_yes" v-model="member" value="yes" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="member_yes" class="ml-3 block text-sm font-medium text-gray-700">Yes. I am a member</label>
                  </div>
                  <div class="flex items-center">
                    <input id="member_no" name="member_no" v-model="member" value="no" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="member_no" class="ml-3 block text-sm font-medium text-gray-700">No. I am a Guest</label>
                  </div>
                </div>
              </fieldset>
      </div>
      <div class="mt-4">
          <InputLabel for="province" value="Province" class="pb-1.5" />
          <select
            name="province"
            id="state"
            v-model="form.province"
            class="h-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
          >
            <option v-for="province in provinces" :key="province.name" :value="province.name">{{province.name}}</option>
            
            
          </select>
          <InputError class="mt-2" :message="form.errors.province" />
        </div>
      <div v-if="member==='yes'" >
        

        <div class="mt-4 col-span-2 mx-auto">
          <InputLabel for="assembly" value="Assembly" />
          <TextInput
            id="town"
            v-model="form.assembly"
            type="text"
            class="mt-1 block w-full"
            required
            autocomplete="assembly"
          />
          <InputError class="mt-2" :message="form.errors.assembly" />
        </div>

        <div class="mt-4 col-span-2 mx-auto">
          <InputLabel for="dob" value="Presiding Pastor" />
          <TextInput
            id="name"
            v-model="form.pastor"
            type="text"
            class="mt-1 block w-full"
            required
            autocomplete="pastor"
          />
          <InputError class="mt-2" :message="form.errors.pastor" />
        </div>
      </div>

     

      <div v-if="member==='no'" class="mt-4 col-span-2 mx-auto">
        <InputLabel for="assembly" value="Invite's name" />
        <TextInput
          id="name"
          v-model="form.invite"
          type="text"
          class="mt-1 block w-full"
          required
          autocomplete="invite"
        />
        <InputError class="mt-2" :message="form.errors.invite" />
      </div>

      <div class="mt-4">
        <fieldset>
                <InputLabel >In need of Accommodation during the Conference?</InputLabel>
                <!-- <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p> -->
                <div class="mt-4 space-y-4">
                 
                  <div class="flex items-center">
                    <input id="accommodation_yes" v-model="form.need_accommodation" value="yes" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="accommodation_yes" class="ml-3 block text-sm font-medium text-gray-700">Yes. I need accommodation</label>
                  </div>
                  <div class="flex items-center">
                    <input id="accommodation_no" v-model="form.need_accommodation" value="no" type="radio" class="h-3 w-3 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="accommodation_no" class="ml-3 block text-sm font-medium text-gray-700">No. I have a place to stay</label>
                  </div>
                </div>
              </fieldset>
              <InputError class="mt-2" :message="form.errors.need_accommodation" />
      </div>

     

      <div class="flex items-center justify-end mt-4">
      

        <PrimaryButton
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Register
        </PrimaryButton>
      </div>
    </form>
  </AuthenticationCard>
</template>
