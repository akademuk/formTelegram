const form = document.getElementById("contact-form");

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const formData = new FormData(event.target);

  try {
    const response = await fetch("submit-form.php", {
      method: form.method,
      body: formData,
      headers: {
        Accept: "application/json",
      },
    });

    const responseData = await response.json();

    if (!response.ok) {
      throw new Error(responseData.message);
    }

    alert("Message sent successfully");
  } catch (error) {
    alert(error.message);
  }
});


