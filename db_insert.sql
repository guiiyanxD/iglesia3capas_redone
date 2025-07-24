INSERT INTO Cargo (id, nombre, descripcion) VALUES
    (1, 'Administrador General', 'Responsable de la gestión integral de la organización.'),
    (2, 'Jefe de Recursos Humanos', 'Encargado de la administración del personal y relaciones laborales.'),
    (3, 'Técnico de Mantenimiento', 'Realiza el mantenimiento preventivo y correctivo de equipos.'),
    (4, 'Contador', 'Gestiona la contabilidad y reportes financieros de la empresa.'),
    (5, 'Auxiliar Administrativo', 'Apoya en tareas administrativas y atención al cliente.');

-- ========================
-- Tabla: Ministerio
-- ========================
INSERT INTO Ministerio (id, nombre, mision, vision, fechaCreacion, activo) VALUES
   (1, 'Ministerio de Jóvenes', 'Formar líderes jóvenes con valores cristianos.', 'Ser un referente de juventud comprometida con la fe.', '2023-01-15', TRUE),
   (2, 'Ministerio de Música', 'Alabar y glorificar a Dios a través de la música.', 'Liderar la adoración en cada evento.', '2022-08-10', TRUE),
   (3, 'Ministerio de Niños', 'Instruir a los niños en la palabra de Dios.', 'Formar niños que amen a Dios.', '2021-05-20', TRUE),
   (4, 'Ministerio de Evangelismo', 'Expandir el mensaje del evangelio.', 'Alcanzar cada rincón con la palabra de Dios.', '2020-11-05', TRUE),
   (5, 'Ministerio de Apoyo Social', 'Brindar ayuda a los más necesitados.', 'Ser luz en medio de la necesidad.', '2019-07-25', TRUE);

-- ========================
-- Tabla: Miembro
-- ========================

-- ========================
-- Tabla: TipoEvento
-- ========================
INSERT INTO TipoEvento (id, nombre, frecuencia, descripcion) VALUES
    (1, 'Culto de Jóvenes', 'Semanal', 'Reuniones semanales dirigidas a jóvenes.'),
    (2, 'Concierto Cristiano', 'Mensual', 'Evento musical organizado por el ministerio de música.'),
    (3, 'Escuela Dominical', 'Semanal', 'Clases para niños sobre la Biblia.'),
    (4, 'Campaña de Evangelismo', 'Trimestral', 'Salidas misioneras de contacto y predicación.'),
    (5, 'Entrega de Alimentos', 'Mensual', 'Actividad de ayuda social con distribución de alimentos.');

-- ========================
-- Tabla: Evento
-- ========================
INSERT INTO Evento (id, nombre, fecha_incio, fecha_final, ubicacion, descripcion, estado, id_tipo_evento, id_ministerio) VALUES
    (1, 'Culto Dominical - Enero', '2025-01-05 10:00:00', '2025-01-05 12:00:00', 'Salón Principal', 'Servicio de adoración y predicación habitual.', 'programado', 1, 1);

-- Evento 2: Estudio Bíblico (2 días de duración)
INSERT INTO Evento (id, nombre, fecha_incio, fecha_final, ubicacion, descripcion, estado, id_tipo_evento, id_ministerio) VALUES
    (2, 'Estudio Profundo de Gálatas', '2025-02-10 19:00:00', '2025-02-12 21:00:00', 'Aula 3', 'Análisis detallado de la Epístola a los Gálatas.', 'programado', 2, 2);

-- Evento 3: Conferencia Juvenil (1 día de duración)
INSERT INTO Evento (id, nombre, fecha_incio, fecha_final, ubicacion, descripcion, estado, id_tipo_evento, id_ministerio) VALUES
    (3, 'Conferencia Jovenes con Proposito', '2025-03-15 09:00:00', '2025-03-15 18:00:00', 'Auditorio', 'Evento anual para inspirar y equipar a la juventud.', 'cancelado', 1, 1);

-- Evento 4: Reunión de Ministerio (pocas horas de duración)
INSERT INTO Evento (id, nombre, fecha_incio, fecha_final, ubicacion, descripcion, estado, id_tipo_evento, id_ministerio) VALUES
    (4, 'Reunión Equipo de Alabanza', '2025-04-20 18:30:00', '2025-04-20 20:00:00', 'Sala de Juntas', 'Planificación del repertorio para los próximos cultos.', 'realizado', 2, 2);

-- Evento 5: Retiro Espiritual (2 días de duración)
INSERT INTO Evento (id, nombre, fecha_incio, fecha_final, ubicacion, descripcion, estado, id_tipo_evento, id_ministerio) VALUES
    (5, 'Retiro de Verano', '2025-07-04 15:00:00', '2025-07-06 12:00:00', 'Campamento El Refugio', 'Tiempo de comunión y reflexión en la naturaleza.', 'realizado', 1, 1);

-- Evento 6: Cena de Fin de Año (unas horas de duración)
INSERT INTO Evento (id, nombre, fecha_incio, fecha_final, ubicacion, descripcion, estado, id_tipo_evento, id_ministerio) VALUES
    (6, 'Cena de Confraternidad Navideña', '2025-12-28 19:00:00', '2025-12-28 23:00:00', 'Restaurante El Buen Sabor', 'Celebración y agradecimiento de fin de año.', 'realizado', 2, 2);

