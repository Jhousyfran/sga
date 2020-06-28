import FormGroupInput from "./Inputs/formGroupInput.vue";
import FormProvider from "./Provider/Form.vue";
import FormProduct from "./Product/Form.vue";

import DropDown from "./Dropdown.vue";
import Button from "./Button";

import Card from "./Cards/Card.vue";
import ChartCard from "./Cards/ChartCard.vue";
import StatsCard from "./Cards/StatsCard.vue";

import SidebarPlugin from "./SidebarPlugin/index";

let components = {
  FormProvider,
  FormProduct,
  FormGroupInput,
  Card,
  ChartCard,
  StatsCard,
  DropDown,
  SidebarPlugin
};

export default components;

export {
  FormProvider,
  FormProduct,
  FormGroupInput,
  Card,
  ChartCard,
  StatsCard,
  DropDown,
  Button,
  SidebarPlugin
};
