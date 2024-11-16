document.addEventListener("DOMContentLoaded", function () {
    const cars = [
        { id: 1, name: "Toyota Camry", image: "camry.jpg", price: "$50/day" },
        { id: 2, name: "Ford Mustang", image: "mustang.jpg", price: "$100/day" },
        { id: 3, name: "Tesla Model 3", image: "tesla.jpg", price: "$120/day" },
    ];

    const carsList = document.getElementById("cars-list");

    cars.forEach(car => {
        const carCard = document.createElement("div");
        carCard.className = "car-card";
        carCard.innerHTML = `
            <img src="${car.image}" alt="${car.name}">
            <h3>${car.name}</h3>
            <p>${car.price}</p>
            <button onclick="bookCar(${car.id})">Book Now</button>
        `;
        carsList.appendChild(carCard);
    });
});

function bookCar(carId) {
    alert(`Car with ID ${carId} booked!`);
}
