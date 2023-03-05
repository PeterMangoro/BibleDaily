<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-bible7 bg-cover bg-no-repeat bg-opacity-50 bg-blend-darken bg-slate-900">
        
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
