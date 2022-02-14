var app = {
    init: function () {
        // Use origin and pathname to force to use https and avoid mixed content
        let origin = window.location.origin;
        let pathname = window.location.pathname;
        $.getJSON(`${origin}${pathname}?users.json`)
            .done(app.writeUsers)
            .fail(app.onFailUsers);
        $.getJSON(`${origin}${pathname}?events`)
            .done(app.writeEvents)
            .fail(app.onFailEvents);
    },
    onFail: function (error) {
        console.log("errore nella lettura del file json");
        console.log(error);
    },
    writeEvents: jsonData => {
		console.log(jsonData)
		for (event_ of jsonData)
			$("main").append(
				`<div class="event">
					<h1>${event_.titolo}</h1>
					<div class="details">
						<span>by ${event_.nome_organizzatore} ${event_.cognome_organizzatore}</span>
						<span> ${event_.costo == 0 ? `free` : `${event_.costo}€`}
					</div>
				</div>`
			)
    }
}


$(document).ready(app.init);