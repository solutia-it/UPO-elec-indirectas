$.extend(true, $.fn.dataTable.defaults, {
  processing: true,
  responsive: true,
  bInfo: false,
  width: '100%',
  bLengthChange: false,
  columnDefs: [
    {
      pageLength: 10,
    },
    { orderable: false, targets: -1 },
  ],
  oLanguage: {
    sEmptyTable: 'No day datos disponibles',
    sSearch: 'Buscar',
    oPaginate: {
      sPrevious: 'Anterior',
      sNext: 'Siguiente',
    },
    sLoadingRecords: 'Cargando...',
  },
});
