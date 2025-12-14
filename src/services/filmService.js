const filmRepository = require("../repositories/filmRepository");

const getAllFilms = async () => {
  return await filmRepository.findAll();
};

const getFilmById = async (id) => {
  return await filmRepository.findById(id);
};

const createFilm = async (data) => {
  const { nama, rating } = data;

  if (!nama || rating === undefined) {
    throw new Error("Nama dan rating wajib diisi");
  }

  return await filmRepository.create(data);
};

const updateFilm = async (id, data) => {
  return await filmRepository.update(id, data);
};

const deleteFilm = async (id) => {
  return await filmRepository.remove(id);
};

module.exports = {
  getAllFilms,
  getFilmById,
  createFilm,
  updateFilm,
  deleteFilm,
};
