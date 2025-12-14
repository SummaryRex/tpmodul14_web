const filmService = require("../services/filmService");

const getAllFilms = async (req, res) => {
  try {
    const films = await filmService.getAllFilms();
    res.status(200).json(films);
  } catch (err) {
    res.status(500).json({ message: err.message });
  }
};

const getFilmById = async (req, res) => {
  try {
    const film = await filmService.getFilmById(req.params.id);
    res.status(200).json(film);
  } catch (err) {
    res.status(500).json({ message: err.message });
  }
};

const createFilm = async (req, res) => {
  try {
    await filmService.createFilm(req.body);
    res.status(201).json({ message: "Film berhasil ditambahkan" });
  } catch (err) {
    res.status(400).json({ message: err.message });
  }
};

const updateFilm = async (req, res) => {
  try {
    await filmService.updateFilm(req.params.id, req.body);
    res.status(200).json({ message: "Film berhasil diupdate" });
  } catch (err) {
    res.status(400).json({ message: err.message });
  }
};

const deleteFilm = async (req, res) => {
  try {
    await filmService.deleteFilm(req.params.id);
    res.status(200).json({ message: "Film berhasil dihapus" });
  } catch (err) {
    res.status(400).json({ message: err.message });
  }
};

module.exports = {
  getAllFilms,
  getFilmById,
  createFilm,
  updateFilm,
  deleteFilm,
};
