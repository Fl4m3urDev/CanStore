--
-- Base de données : `jardin`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `nutriscore` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`num`, `nom`, `prix`, `image`, `type`, `nutriscore`) VALUES
(1, 'fèves au lard', 0.4, 'beans.jpg', 'legumes', 'B'),
(2, 'hot-dogs', 1.99, 'hotdogs.jpg', 'viande', 'E'),
(3, 'Spam', 2.85, 'spam.jpg', 'viande', 'E'),
(4, 'haricots frits', 0.99, 'refried.jpg', 'legumes', 'E'),
(5, 'haricots rouges', 0.58, 'kidney.jpg', 'legumes', 'C'),
(6, 'petits pois', 0.52, 'gardenpeas.jpg', 'legumes', 'A'),
(7, 'purée de pois', 0.58, 'mushypeas.jpg', 'legumes', 'B'),
(8, 'bœuf salé', 2.39, 'cornedbeef.jpg', 'viande', 'E'),
(9, 'Soupe à la tomate', 1.4, 'tomatosoup.jpg', 'soupe', 'C'),
(10, 'tomates hachées', 0.45, 'tomato.jpg', 'legumes', 'A'),
(11, 'Soupe de nouilles au poulet', 1.89, 'chickennoodle.jpg', 'soupe', 'D'),
(12, 'Soupe de carottes et coriandre', 1.49, 'carrotcoriander.jpg', 'soupe', 'D');
COMMIT;