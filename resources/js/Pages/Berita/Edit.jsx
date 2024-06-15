import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { useForm, usePage } from "@inertiajs/react";

const Edit = () => {
    const { berita } = usePage().props;
    const { data, setData, put, errors } = useForm({
        media: berita.media || "",
        headline_berita: berita.headline_berita || "",
        isi_berita: berita.isi_berita || "",
        tanggal_publikasi: berita.tanggal_publikasi || "",
        coresponden: berita.coresponden || "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(route("beritas.update", berita.id));
    };

    return (
        <div>
            <h1>Edit Berita</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Media</label>
                    <input
                        type="text"
                        value={data.media}
                        onChange={(e) => setData("media", e.target.value)}
                    />
                    {errors.media && <div>{errors.media}</div>}
                </div>
                <div>
                    <label>Headline Berita</label>
                    <input
                        type="text"
                        value={data.headline_berita}
                        onChange={(e) =>
                            setData("headline_berita", e.target.value)
                        }
                    />
                    {errors.headline_berita && (
                        <div>{errors.headline_berita}</div>
                    )}
                </div>
                <div>
                    <label>Isi Berita</label>
                    <textarea
                        value={data.isi_berita}
                        onChange={(e) => setData("isi_berita", e.target.value)}
                    />
                    {errors.isi_berita && <div>{errors.isi_berita}</div>}
                </div>
                <div>
                    <label>Tanggal Publikasi</label>
                    <input
                        type="date"
                        value={data.tanggal_publikasi}
                        onChange={(e) =>
                            setData("tanggal_publikasi", e.target.value)
                        }
                    />
                    {errors.tanggal_publikasi && (
                        <div>{errors.tanggal_publikasi}</div>
                    )}
                </div>
                <div>
                    <label>Coresponden</label>
                    <input
                        type="text"
                        value={data.coresponden}
                        onChange={(e) => setData("coresponden", e.target.value)}
                    />
                    {errors.coresponden && <div>{errors.coresponden}</div>}
                </div>
                <button type="submit">Save</button>
            </form>
        </div>
    );
};

export default Edit;
