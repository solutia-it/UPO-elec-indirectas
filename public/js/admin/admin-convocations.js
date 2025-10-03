const urlByType = {
  [CENTER_TYPE]: urlGetCenterConvocations,
  [DEPARTMENT_TYPE]: urlGetDepartmentConvocations,
};
const idByType = {
  [CENTER_TYPE]: '#centerConvocationsTable',
  [DEPARTMENT_TYPE]: '#deparmentConvocationsTable',
};

function getUrlDataByType(type) {
  return urlByType[type] || null;
}

function initConvocationTable(type) {
  const url = getUrlDataByType(type);

  $(idByType[type]).DataTable({
    bDestroy: true,
    processing: false,
    serverSide: false,
    orderCellsTop: true,
    autoWidth: false,
    ajax: url,
    columnDefs: [
      { width: '5%', targets: 0 },
      { width: '7%', targets: 4 },
      { width: '15%', targets: [2, 3] },
      { width: '15%', targets: 5 },
    ],
    columns: [
      { data: 'id' },
      { data: 'nombre' },
      {
        data: 'fecha_inicio',
        render: function (data) {
          return moment(data).format('DD-MM-YYYY H:mm');
        },
      },
      {
        data: 'fecha_fin',
        render: function (data) {
          return moment(data).format('DD-MM-YYYY H:mm');
        },
      },
      { data: 'estado' },
      {
        data: 'acciones',
        render: function (data, type, full, meta) {
          return data;
        },
      },
    ],
    order: [[3, 'desc']],
    initComplete: function () {
      const api = this.api();
      const table = api.table().node();
      const $thead = $(table).find('thead');

      api.columns().every(function (colIdx) {
        const column = this;
        const input = $('input', $thead.find('tr:eq(1) th').eq(colIdx));

        if (input.length) {
          input.on('keyup change clear', function () {
            if (column.search() !== this.value) {
              column.search(this.value).draw();
            }
          });
          input.on('click', function (e) {
            e.stopPropagation();
          });
        }
      });
    },
  });
}

$(function () {
  initConvocationTable(CENTER_TYPE);
  initConvocationTable(DEPARTMENT_TYPE);
});
