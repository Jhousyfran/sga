import DashboardLayout from "./../layout/dashboard/DashboardLayout.vue";
import BeforeLayout from "./../layout/dashboard/BeforeLayout.vue";
// GeneralViews
import NotFound from "./../pages/NotFoundPage.vue";

// Admin pages
import Dashboard from "./../pages/Dashboard.vue";
import ProviderProfile from "./../pages/ProviderProfile.vue";
import Products from "./../pages/Products.vue";
import Product from "./../pages/Product.vue";
import Login from "./../pages/Login.vue";
import Register from "./../pages/Register.vue";

const routes = [
  {
    path: "/",
    component: DashboardLayout,
    redirect: "/dashboard",
    children: [
      {
        path: "dashboard",
        name: "dashboard",
        component: Dashboard
      },
      {
        path: "fornecedor",
        name: "Cadastro Fornecedor",
        component: ProviderProfile
      },
      {
        path: "produtos",
        name: "produtos",
        component: Products
      },
      {
        path: "produto/novo",
        name: "Novo Produto",
        component: Product
      },
      {
        path: "produto/:id",
        name: "produto",
        component: Product
      },
    ]
  },
  {
    path: "/login",
    component: BeforeLayout,
    // redirect: "/dashboard",
    children: [
      {
        path: "/",
        name: "login",
        component: Login
      },
    ]
  },
  {
    path: "/cadastro",
    component: BeforeLayout,
    // redirect: "/dashboard",
    children: [
      {
        path: "/",
        name: "cadastro",
        component: Register
      },
    ]
  },
  { path: "*", component: NotFound }
];

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes;
