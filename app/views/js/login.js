
const { createApp, ref } = Vue

const app = createApp({
    setup() {

      const status = ref(false);
      const user_name = ref("");
      const password = ref("");
      const whoActive = ref(1);

      const login = () =>
      {
  
        fetch('http://localhost/MVC/public/services/login/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            username: user_name.value,
            password: password.value
        })
        }).then(resp => resp.json())
        .then(data => 
          { 
            if(data[0].status == 1)
              window.location.href = "http://localhost/MVC/public/";
            else
              status.value = true;
        })
        .catch(err => { console.log(err) });

      }


      return {
         status, user_name, password, whoActive, login
      }


    }
  })

app.mount('#app')
