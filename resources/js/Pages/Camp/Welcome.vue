<template>
    <camp-layout title="Welcome">
  
      <div class="pb-3">
        <landing-page :images="images2" class="pb-3" />

        <div class="flex flex-wrap w-auto gap-3 justify-evenly m-2  ">
          <welcome-card image="/storage/fcc-dash/choir.jpg" heading="Registration"
            detail="Register now..Be part of the movement..Be Us"
            path="registerForCamp" />
  
          <welcome-card image="/storage/fcc-dash/crowd.jpg" heading="Youth"
            detail="Find the best car deals and drive the car of your dreams" path="campRegister" />

            <welcome-card image="/storage/fcc-dash/crowd.jpg" heading="Guest Speakers"
            detail="Find the best car deals and drive the car of your dreams" path="campRegister" />
  
            <welcome-card image="/storage/fcc-dash/crowd.jpg" heading="Transport"
            detail="Find the best car deals and drive the car of your dreams" path="campRegister" />
  
  
          <welcome-card image="/storage/fcc-dash/choir.jpg" heading="Media"
              detail="Find the place you will call home " path="campRegister" />
  
          <welcome-card image="/storage/fcc-dash/choir.jpg" heading="Praise and Worship"
            detail="Purchase land for your projects at good strategic locations " path="campRegister" />
  
            <welcome-card image="/storage/fcc-dash/crowd.jpg" heading="Accommodation"
            detail="Find the best car deals and drive the car of your dreams" path="campRegister" />
  

            <welcome-card image="/storage/fcc-dash/crowd.jpg" heading="Hygiene & Sanitation"
            detail="Find the best car deals and drive the car of your dreams" path="cleaning-department" />
  
          
          <!-- <welcome-card
            image="    🛣"
            heading="Travel & Transport"
            detail="Purchase land for your projects at good strategic locations "
            path="welcome.transports.index"
          /> -->
        </div>
      </div>
  
  </camp-layout>
  </template>
  
  <script setup>
  import CampLayout from "@/Layouts/CampLayout.vue";
  import WelcomeCard from "@/Components/Welcome/WelcomeCard.vue";
  import LandingPage from "@/Components/Shared/Gallery/LandingPage.vue";
  // import CallToAction from "@/Components/Welcome/CallToAction.vue";
  const props = defineProps({
    data: Object,
  });
  
  
  
  const images = [
    'car.jpg',
    'cars.webp',
    'clothes.jpg',
    'construction.jpeg',
    'construction.jpg',
    'construction2.jpg',
    'construction3.jpg',
    'construction4.jpg',
    'construction5.jpg',
    'estate.jpg',
    'estate2.jpg',
    'estate3.jpg',
    'farm.webp',
    'fruits.jpg',
    'house.jpeg',
    'house.jpg',
    'product.webp',
    'shop.jpg',
    'shop2.jpg',
    'shopping.jpg',
  
  ]
  
  const images2 = [
    {
      id: 1,
      path: '/storage/fcc-dash/choir.jpg'
    }
    ,
   
  
    {
      id: 2,
      path: '/storage/fcc-dash/choir-1.jpg'
    }
    ,
  
    {
      id:4,
      path: '/storage/fcc-dash/crowd.jpg'
    }
   
    ,
    {
      id:4,
      path: '/storage/fcc-dash/crowds.jpg'
    }
   
    ,
    {
      id:4,
      path: '/storage/fcc-dash/congregation.jpg'
    }
   
    ,
    {
      id:4,
      path: '/storage/fcc-dash/dancing.jpg'
    }
   
    ,
    {
      id:4,
      path: '/storage/fcc-dash/kids.jpg'
    }
   
    ,

    {
      id:4,
      path: '/storage/fcc-dash/mzhari.jpg'
    }
   
    ,
    
    {
      id:4,
      path: '/storage/fcc-dash/prayer.jpg'
    }
   
    ,
    {
      id:4,
      path: '/storage/fcc-dash/tembo.jpg'
    }
   
    ,

    {
      id:4,
      path: '/storage/fcc-dash/youth.jpg'
    }
   
    ,
   
  ]
  
  setInterval(getPath, 1000 * 3);
  
  function getPath() {
    // console.log('Hello world');
    return 'url(' + '/storage/landing/' + random_item(images) + ')';
  
  }
  function random_item(images) {
  
    return images[Math.floor(Math.random() * images.length)];
  
  }
  </script>
  
  <style></style>
  