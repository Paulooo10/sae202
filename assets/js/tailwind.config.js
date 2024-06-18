// tailwind.config.js
module.exports = {
  theme: {
    screens: { //ON CHANGE LES ÉCRANS POUR LE RESPONSIVE
      'sm': '640px',
      'md': '768px',
      'lg': '960px',
      'xl': '1024px',
    },
  },
  plugins: [
    require('@tailwindcss/forms'), //PLUGIN POUR LES FORMULAIRES DU SITE
    require('flowbite/plugin') //PLUGIN POUR IMPORTER LE DATEPICKER DE FLOWBITE
  ],
  content: [
    "node_modules/flowbite/**/*.js"
]

}

