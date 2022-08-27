console.log('Hello World!');

const newsletter_form = document.getElementById("newsletter_form");

newsletter_form.addEventListener("submit", (e) => {
    e.preventDefault();

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;

    console.log(name, email);

    sendForm(name, email);

})

function sendForm(name, email) {
    const data = { name, email };

    fetch('./server/process.php', {
      method: 'POST', // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('Success:', data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
}