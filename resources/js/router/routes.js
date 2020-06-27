import DashboardLayout from "./../layout/dashboard/DashboardLayout.vue";
import BeforeLayout from "./../layout/dashboard/BeforeLayout.vue";
// GeneralViews
import NotFound from "./../pages/NotFoundPage.vue";

// Admin pages
import Dashboard from "./../pages/Dashboard.vue";
import UserProfile from "./../pages/UserProfile.vue";
import Notifications from "./../pages/Notifications.vue";
import Icons from "./../pages/Icons.vue";
import Products from "./../pages/Products.vue";

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
        path: "stats",
        name: "Cadastro Fornecedor",
        component: UserProfile
      },
      {
        path: "notifications",
        name: "notifications",
        component: Notifications
      },
      {
        path: "icons",
        name: "icons",
        component: Icons
      },
      {
        path: "table-list",
        name: "Produtos",
        component: Products
      }
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
        // component: Dashboard
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
