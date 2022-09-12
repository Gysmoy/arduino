const Button = (data) => {
    let button = `
    <i class="fa fa-lightbulb"></i>
    ${data.status ? 'ON' : 'OFF'}
    `;
    return button;
}
const Room = (data) => {
    let room = data.room;
    let description = data.description;
    let status = data.status;
    let tr = `<tr>
        <td class="descripcion">
            ${room}
            <small>${description}</small>
        </td>
        <td>
            <button id="btn-status" class="light-${status ? 'on' : 'off'}">
                ${Button(data)}
            </button>
        </td>
    </tr>`;
    let e = $.parseHTML(tr)[0];
    e.setAttribute('data-room', JSON.stringify(data));
    return e;
}