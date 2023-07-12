function sendWhatsAppMessage() {
    var message = "¡Hola! Estoy interesado en sus servicios.";
    var phoneNumber = "9982206852"; // número de teléfono del destinatario (sin el signo +)
    var whatsappLink = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);
    window.open(whatsappLink, '_blank');
}