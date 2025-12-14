const db = require("../config/database");

const findAll = async () => {
  const [rows] = await db.query("SELECT * FROM films ORDER BY createdAt DESC");
  return rows;
};

const findById = async (id) => {
  const [rows] = await db.query("SELECT * FROM films WHERE id=?", [id]);
  return rows[0];
};

const create = async (data) => {
  const { nama, deskripsi, tanggal_rilis, rating } = data;
  await db.query(
    "INSERT INTO films (nama, deskripsi, tanggal_rilis, rating) VALUES (?,?,?,?)",
    [nama, deskripsi, tanggal_rilis, rating]
  );
};

const update = async (id, data) => {
  const { nama, deskripsi, tanggal_rilis, rating } = data;
  await db.query(
    "UPDATE films SET nama=?, deskripsi=?, tanggal_rilis=?, rating=? WHERE id=?",
    [nama, deskripsi, tanggal_rilis, rating, id]
  );
};

const remove = async (id) => {
  await db.query("DELETE FROM films WHERE id=?", [id]);
};

module.exports = { findAll, findById, create, update, remove };
