<template>
    <camp-layout title="Welcome">
  
      <div class="pb-3">
        <landing-page :images="images2" class="pb-3" />

        <div class="flex flex-wrap w-auto gap-3 justify-evenly m-2  ">
          <welcome-card image="/storage/fcc/easter.jpeg" heading="Registration"
            detail="Register now..Be part of the Family.Be Family Covenant Church"
            path="registerCamp" />

            <welcome-card image="/storage/it/2.jpg" heading="Information & Technology"
             path="it-department" />
  
          <welcome-card image="/storage/youth/8.jpg" heading="Youth"
             path="youth-department" />

            <welcome-card image="/storage/speakers/1.jpg" heading="Preachers"
             path="speakers" />
  
            <welcome-card image="/storage/transport/1.jpg" heading="Transport & Logistics"
             path="transport" />
  
  
          <!-- <welcome-card image="/storage/media/3.jpg" heading="Media"
               path="camp-welcome" /> -->
  
          <welcome-card image="/storage/fcc-dash/choir.jpg" heading="Praise and Worship"
            path="worship" />
  
            <!-- <welcome-card image="/storage/fcc-dash/crowd.jpg" heading="Accommodation"
             path="camp-welcome" /> -->
  

            <welcome-card image="/storage/cleaning/cleaning-set.jpg" heading="Hygiene & Sanitation"
            path="cleaning-department" />
  
        
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
    {
      id:4,
      path: '/storage/worship/12.jpg'
    }
   
    ,
    {
      id:4,
      path: '/storage/youth/2.jpg'
    }
   
    ,

    {
      id:4,
      path: '/storage/youth/12.jpg'
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
  