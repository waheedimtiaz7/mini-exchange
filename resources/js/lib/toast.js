import { reactive } from "vue";

export const toast = reactive({
  show: false,
  message: "",
  type: "info",
});

export function notify(message, type = "info") {
  toast.message = message;
  toast.type = type;
  toast.show = true;

  setTimeout(() => (toast.show = false), 2500);
}
