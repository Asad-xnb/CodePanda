
            const locateButton = document.getElementById('locate');
            const findFoodButton = document.getElementById('findFood');
            const cityInput = document.getElementById('cityInput');

            locateButton.addEventListener('click', () => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        async (position) => {
                            // const { latitude, longitude } = position.coords;
                            const latitude = 31.4504
                            const longitude = 73.1350

                            const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`);
                            const data = await response.json();
                            console.log(data);
                            let city = data.address.city || data.address.town || data.address.village || "Unknown";
                            city = city.split(' ')[0].trim();

                            if (city && city !== "Unknown") {
                                
                                cityInput.value = city;
                                window.location.href = `/city/${encodeURIComponent(city)}`;
                            } else {
                                alert("City could not be determined.");
                            }
                        },
                        (error) => {
                            console.error("Error occurred while retrieving location: ", error);
                            alert("Could not retrieve your location. Please allow location access.");
                        }
                    );
                } else {
                    alert("Geolocation is not supported by your browser.");
                }
            });

            findFoodButton.addEventListener('click', () => {
                const city = cityInput.value.trim();
                if (city) {
                    window.location.href = `/city/${encodeURIComponent(city)}`;
                } else {
                    alert("Please enter a city name.");
                }
            });
    