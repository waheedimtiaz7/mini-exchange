import Echo from "laravel-echo";
import Pusher from "pusher-js";

export function makeEcho(token) {
  window.Pusher = Pusher;

  return new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_KEY,
    cluster: import.meta.env.VITE_PUSHER_CLUSTER,
    forceTLS: true,
    authEndpoint: "/broadcasting/auth",
    auth: {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    },
  });
}
