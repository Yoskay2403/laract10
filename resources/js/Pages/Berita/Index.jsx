import React from "react";
import { Link, usePage } from "@inertiajs/react";

const Index = () => {
    const { beritas } = usePage().props;

    return (
        <div>
            <h1>Berita</h1>
            <Link href={route("beritas.create")} className="btn btn-primary">
                Create
            </Link>
            <table className="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Media</th>
                        <th>Headline</th>
                        <th>Isi</th>
                        <th>Tanggal Publikasi</th>
                        <th>Coresponden</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {beritas.map((berita) => (
                        <tr key={berita.id}>
                            <td>{berita.id}</td>
                            <td>{berita.media}</td>
                            <td>{berita.headline_berita}</td>
                            <td>{berita.isi_berita}</td>
                            <td>{berita.tanggal_publikasi}</td>
                            <td>{berita.coresponden}</td>
                            <td>
                                <Link
                                    href={route("beritas.edit", berita.id)}
                                    className="btn btn-warning"
                                >
                                    Edit
                                </Link>
                                <form
                                    method="POST"
                                    action={route("beritas.destroy", berita.id)}
                                    style={{ display: "inline" }}
                                >
                                    <input
                                        type="hidden"
                                        name="_method"
                                        value="DELETE"
                                    />
                                    <button
                                        type="submit"
                                        className="btn btn-danger"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Index;
